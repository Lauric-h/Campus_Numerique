package weapon;

/**
 * Attack class handling attack items
 * @author lauric
 *
 */
public abstract class Attack {
	private String name;
	private String type;
	private int damage;
	
	/**
	 * Constructor
	 * @param name
	 * @param type
	 * @param damage
	 */
	public Attack(String name, String type, int damage) {
		this.name = name;
		this.type = type;
		this.damage = damage;
	}

	@Override
	public String toString() {
		return "[Nom = " + name + ", Type = " + type + ", Dégâts = " + damage + "]";
	}

	// Getters and setters
	
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
	 * Get damage
	 * @return damage
	 */
	public int getDamage() {
		return damage;
	}

	/**
	 * Modify damage
	 * @param damage
	 */
	public void setDamage(int damage) {
		this.damage = damage;
	}

}
