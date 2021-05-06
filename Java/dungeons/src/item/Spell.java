package item;

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
	 * @param value
	 */
	public Spell(String name, String type, int value, int damage ){
		super(name, type, value, damage);
		// TODO Auto-generated constructor stub
	}

	/**
	 * Constructor with default values
	 */
	public Spell() {
		super("Sort de base", "Sort", 2, 8);
	}
	
}
