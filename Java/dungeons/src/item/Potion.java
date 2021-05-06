package item;

/**
 * Helper item Potion
 * Gives HP to whoever discovers it
 * @author lauric
 *
 */
public class Potion extends Item {
	private int healthPoints;
	
	/**
	 * Constructor
	 * @param name
	 * @param type
	 * @param value
	 * @param healthPoints
	 */
	public Potion(String name, String type, int value, int healthPoints) {
		super(name, type, value);
		this.healthPoints = healthPoints;
	}

	/**
	 * Constructor with default values
	 */
	public Potion() {
		super("Potion de base", "Potion", 2);
		this.healthPoints = 2;
	}

	// Getters & Setters
	public int getHealthPoints() {
		return healthPoints;
	}

	public void setHealthPoints(int healthPoints) {
		this.healthPoints = healthPoints;
	}
	
	
	

}
