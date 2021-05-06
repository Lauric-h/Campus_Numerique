package item;

/**
 * Stick class
 * Weakest weapon you can get
 * @author lauric
 *
 */
public class Stick extends Attack {

	/**
	 * Constructor
	 * @param name
	 * @param type
	 * @param value
	 * @param damage
	 */
	public Stick(String name, String type, int value, int damage) {
		super(name, type, value, damage);
		// TODO Auto-generated constructor stub
	}
	
	/**
	 * Constructor with default values
	 */
	public Stick() {
		super("Bâton de base", "Arme à 2 mains", 1, 3);
	}
}
