public class Moving {
	
	
	public static void main(String[] args) {
		int totalBoxes = 34;
		int truckCapacity = 9;
		while(totalBoxes >= truckCapacity) {
			System.out.println("Voyage de 9 cartons");
			totalBoxes -= truckCapacity;
		}
		System.out.println("Voyage de " + totalBoxes + " cartons");
	}
}