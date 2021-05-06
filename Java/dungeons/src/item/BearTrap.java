package item;

/**
 * Trap item BearTrap
 * HealthPoints should be negative
 * @author lauric
 *
 */
public class BearTrap extends Item {
	private int healthPoints;
	
	/**
	 * Constructor
	 * @param name
	 * @param type
	 * @param value
	 * @param healthPoints
	 */
	public BearTrap(String name, String type, int value, int healthPoints) {
		super(name, type, value);
		this.healthPoints = healthPoints;
	}
	
	/**
	 * Constructor with default values
	 */
	public BearTrap() {
		super("Piège à ours", "Piège", 3);
		this.healthPoints = -2;
	}

	// Getters and Setters
	public int getHealthPoints() {
		return healthPoints;
	}

	public void setHealthPoints(int healthPoints) {
		this.healthPoints = healthPoints;
	}

	

}
