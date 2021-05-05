package weapon;

/**
 * Class Spell extending Attack 
 * Handles Spell items for Mage
 * @author lauric
 *
 */
public class Spell extends Attack {

	/**
	 * Constructor with all params
	 * @param name
	 * @param type
	 * @param damage
	 */
	public Spell(String name, String type, int damage) {
		super(name, type, damage);
		// TODO Auto-generated constructor stub
	}

	/**
	 * Constructor with no params
	 * Sets default values for other params
	 */
	public Spell() {
		super("Sort de base", "Sort", 8);
	}
	
}
