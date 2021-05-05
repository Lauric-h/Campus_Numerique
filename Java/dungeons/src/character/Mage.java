package character;
import weapon.*;

/**
 * Mage class extending Character class
 * @author lauric
 *
 */
public class Mage extends Adventurer {

	/**
	 * First constructor with all params
	 * @param type
	 * @param name
	 * @param health
	 * @param strength
	 * @param spell
	 * @param defenseItem
	 */
	public Mage(String type, String name, int health, int strength, Spell spell, String defenseItem) {
		super("Mage", name, health, strength, spell, defenseItem);
		// TODO Auto-generated constructor stub
	}

	/**
	 * Second constructor with name params
	 * Sets default values for other params
	 * @param name
	 */
	public Mage(String name) {
		this("Mage", name,3, 8, new Spell(),"Philtre");
	}
	
	/**
	 * Third constructor with no params
	 * Sets default values for all params
	 */
	public Mage() {
		this("Mage", "Mage",3, 8, new Spell(),"Philtre");
	}
}
