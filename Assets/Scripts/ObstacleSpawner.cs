using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ObstacleSpawner : MonoBehaviour {

	[SerializeField] private float waitTime;
	[SerializeField] private GameObject[] obstaclePrefabs;
	private int[] pattern = new int[] { 1, 1, 1, 0, 0 };
	private float tempTime;
	private int index = 0;
	void Start(){
		tempTime = waitTime - Time.deltaTime;
	}

	void LateUpdate () {
		if(GameManager.Instance.GameState()){
			tempTime += Time.deltaTime;
			if(tempTime > waitTime){
				if(index  > pattern.Length)
				{
					index = 0;
				}
				// Wait for some time, create an obstacle, then set wait time to 0 and start again
				tempTime = 0;
                GameObject pipeClone = Instantiate(obstaclePrefabs[Random.Range(0, obstaclePrefabs.Length)], transform.position, transform.rotation);
				pipeClone.GetComponent<ObstacleBehaviour>().upObs.transform.localScale = pattern[index] == 1 ? new Vector3(5f, 4.5f, 5f) : new Vector3(5f, 5f, 5f);
                pipeClone.GetComponent<ObstacleBehaviour>().upObs.transform.localScale = pattern[index] == 1 ? new Vector3(5f, 4.5f, 5f) : new Vector3(5f, 5f, 5f);
                index++;
			}
		}
	}

	void OnTriggerEnter2D(Collider2D col){
		if(col.gameObject.transform.parent != null){
			Destroy(col.gameObject.transform.parent.gameObject);
		}else{
			Destroy(col.gameObject);
		}
	}

}
