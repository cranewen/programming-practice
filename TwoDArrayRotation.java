package basics;

public class TwoDArrayRotation {

	int[][] ratation(){
		int twoD[][] = new int[4][5];
		int x = 1;
		for(int i = 0; i<4; i++){
			for(int j = 0; j<5; j++){
				twoD[i][j] = x;
				x++;
			}
		}
		int newTwoD[][] = new int[twoD[0].length][twoD.length];
		for(int j = 0; j<twoD[0].length; j++){
			for(int i = 0; i<twoD.length; i++){
				newTwoD[j][i] = twoD[twoD.length-i-1][j];
				//System.out.println(newTwoD[j][i]);
			}
		}
		return newTwoD;	
	}
	
	public static void main(String[] args) {
		TwoDArrayRotation tdar = new TwoDArrayRotation();
		int[][] test = tdar.ratation();
		for (int i = 0; i < test.length; i++) {
			for(int j=0; j < test[0].length; j++){
				System.out.println(test[i][j]);
			}
		}
	}
}
