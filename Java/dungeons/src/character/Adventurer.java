package character;
import weapon.*;

/**
 * Class handling character attributes
 * @author lauric
 */

public abstract class Adventurer {
	private String type;
	private String name;
	private int health;
	private int strength;
	private Attack attackItem;
	private String defenseItem;
	
	/**
	 * Constructor
	 * @param type
	 * @param name
	 * @param health
	 * @param strength
	 * @param attackItem
	 * @param defenseItem
	 */
	public Adventurer(String type, String name, int health, int strength, Attack attackItem, String defenseItem) {
		this.type = type;
		this.name = name;
		this.health = health;
		this.strength = strength;
		this.attackItem = attackItem;
		this.defenseItem = defenseItem;
	}

	/**
	 * Overriding toString method
	 * @Override
	 */
	public String toString() {
		return "Type = " + type + ", Nom = " + name + ", Points de vie = " + health + ", Force = " + strength + ", Attaque = "
				+ attackItem + ", Défense = " + defenseItem;
	}

	// Getters and setters
	/**
	 * Get type
	 * @return type
	 */
	public String getType() {
		return type;
	}

	/**
	 * Modify type
	 * @param type
	 */
	public void setType(String type) {
		this.type = type;
	}
	
	/**
	 * Get name
	 * @return name
	 */
	public String getName() {
		return name;
	}

	/**
	 * Modify name 
	 * @param name
	 */
	public void setName(String name) {
		this.name = name;
	}

	/**
	 * Get health
	 * @return health;
	 */
	public int getHealth() {
		return health;
	}

	/**
	 * Modify health
	 * @param health
	 */
	public void setHealth(int health) {
		this.health = health;
	}

	/**
	 * Get strength
	 * @return strength
	 */
	public int getStrength() {
		return strength;
	}

	/**
	 * Modify strength
	 * @param strength
	 */
	public void setStrength(int strength) {
		this.strength = strength;
	}

	/**
	 * Get weapon
	 * @return
	 */
	public Attack getAttackItem() {
		return attackItem;
	}

	/**
	 * Modify weapon
	 * @param attackItem
	 */
	public void setAttackItem(Attack attackItem) {
		this.attackItem = attackItem;
	}

	/**
	 * Get defensive item
	 * @return defenseItem
	 */
	public String getDefenseItem() {
		return defenseItem;
	}

	/**
	 * Modify defensive item
	 * @param defenseItem
	 */
	public void setDefenseItem(String defenseItem) {
		this.defenseItem = defenseItem;
	}

	/**
	 * Logs all attributes in console
	 */
	public void displayStats() {
		System.out.println("Nom : " + this.getName());
		System.out.println("Attaque : " + this.getAttackItem());
		System.out.println("Défense : " + this.getDefenseItem());
		System.out.println("Vie : " + this.getHealth());
		System.out.println("Force : " + this.getStrength());
	}
	
}
