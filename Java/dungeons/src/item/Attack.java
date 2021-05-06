package item;

/**
 * Attack class handling attack items
 * @author lauric
 *
 */
public abstract class Attack extends Item{
	private int damage;

	/**
	 * Constructor
	 * @param name
	 * @param type
	 * @param value
	 */
	public Attack(String name, String type, int value, int damage) {
		super(name, type, value);
		this.damage = damage;
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
