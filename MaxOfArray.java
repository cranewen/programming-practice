package algorithms;

public class MaxOfArray {
	int maxNum(int[] x){
		int first = 0; // The first number in a comparison
		int i = 1;
		
		while(x[first] >= x[i] && (first<x.length-1) && (i<x.length-1)){
			i++;
			if(x[first] <= x[i]){
				first = i;
			}
		}
		return x[first];
	}
	
	public static void main(String[] args) {
		MaxOfArray ma = new MaxOfArray();
		int[] numberArray = {3,2,4,5,6,22,2,42,1,4,7,99,5,4,3432,4,2,23,23};
		int[] numberArray2 = {2387,1213,1,32,442,12,12,3,3,0,1,12,13,4,7,84,65,545,1};
		System.out.println(ma.maxNum(numberArray));
		System.out.println(ma.maxNum(numberArray2));
	}
}
