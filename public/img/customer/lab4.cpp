#include <stdio.h>
#define MAX 20
struct GRAPH
{
	int array[MAX][MAX];
	int n;
};

struct EDGE {
	int be;
	int en;
	int value;
};
int consider_[MAX];
EDGE E[MAX];

void FindConnectedVertices(GRAPH, int[], int);

int findConnectedComponents(GRAPH g){
	int label[MAX];
	
	for(int i=0;i<g.n;i++)
		label[i]=0;
	
	int connectednumbers = 0;
	
	for(int i=0;i<g.n;i++){
		if(label[i]==0){
			connectednumbers++;
			label[i] = connectednumbers;			
		}
		if(label[i]!=0)
			FindConnectedVertices(g,label,i);
	}
	return connectednumbers;
}

void Prim_Algorithm(GRAPH g){
	if(findConnectedComponents(g) != 1){
		printf("Non-connected graph!");
		return;
	}
	int nE = 0;
	for(int i=0;i<g.n;i++)
		consider_[i] = 0;
	consider_[0]=1;
	while(nE < g.n -1){
		EDGE min_edge;
		int min_value = 100;
		for(int i=0;i<g.n;i++)
			if(consider_[i]==1){
				for(int j= 0;j<g.n;j++)
					if(consider_[j]==0 && g.array[i][j] != 0 && min_value > g.array[i][j]){
						min_edge.be = i;
						min_edge.en = j;
						min_edge.value = g.array[i][j];
						min_value = g.array[i][j];
					}
			}
		E[nE] = min_edge;
		nE++;
		consider_[min_edge.en] = 1;
	}
	int weight = 0;
	printf("The Spanning tree: \n");
	for(int i=0;i<nE-1;i++){
		printf("(%d,%d), ", E[i].be+1, E[nE-1].en+1);
		weight += E[i].value;
	}
	printf("(%d,%d).\n", E[nE-1].be+1, E[nE-1].en+1);
	weight += E[nE-1].value;
	printf("Sum of weight: %d\n", weight);
}

void AscendingSort(EDGE Ed[MAX], int c){
	EDGE edge;
	for(int i=0;i<c-1;i++){
		for(int j=i+1;j<c;j++){
			if(Ed[i].value > Ed[j].value){
				edge = Ed[i];
				Ed[i] = Ed[j];
				Ed[j] = edge;
			}
		}
	}
}

void KruskalAlgorithm(GRAPH g){
	EDGE listE[MAX];
	int edge_sum = 0;
	for(int i=0;i<g.n;i++)
		for(int j=i+1;j<g.n;j++)
			if(g.array[i][j] > 0){
				listE[edge_sum].be =i;
				listE[edge_sum].en =j;
				listE[edge_sum].value =g.array[i][j];
				edge_sum++;
			}
		AscendingSort(listE,edge_sum);
		int nE = 0;
		EDGE E[MAX];
		int label[MAX];
		for(int i=0;i<g.n;i++){
			label[i] = i;
		}
		int considering_edge = 0;
		while(nE < g.n && considering_edge < edge_sum){
			if(label[listE[considering_edge].be] != label[listE[considering_edge].en]){
				E[nE] = listE[considering_edge];
				nE++;
				int value = label[listE[considering_edge].en];
				for(int j=0;j<g.n;j++){
					if(label[j] == value){
						label[j] = label[listE[considering_edge].be];
					}
				}
			}
		considering_edge++;			
		}
		if(nE != g.n -1 ){
			printf("Non-connected graph!");
		}else{
			int weight = 0;
			printf("\nConnected graph\n");
			printf("Spending tree\n");
			for(int i=0;i<nE-1;i++){
				printf("(%d,%d)", E[i].be +1,E[i].en + 1);
				weight += E[i].value;
			}
		printf("(%d,%d).\n", E[nE-1].be + 1,E[nE-1].en + 1);
		weight += E[nE-1].value;
		printf("\nSum of weight: %d\n", weight);
		}
}

