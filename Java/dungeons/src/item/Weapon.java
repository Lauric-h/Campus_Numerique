package item;

/**
 * Weapon class extending Attack
 * Handles Weapon items for Warrior
 * @author lauric
 *
 */
public class Weapon extends Attack {

	/**
	 * Constructor with all params
	 * @param name
	 * @param type
	 * @param value
	 * @param damage
	 */
	public Weapon(String name, String type, int value, int damage) {
		super(name, type, value, damage);
		// TODO Auto-generated constructor stub
	}

	/**
	 * Constructor with no params
	 * Sets default value for other params
	 */
	public Weapon() {
		super("Epée de base", "Arme", 7, 5);
	}
	

}
