package character;
import item.*;

/**
 * Warrior class extending Character class
 * @author lauric
 *
 */

public class Warrior extends Adventurer{
	
	/**
	 * First constructor with all params
	 * @param type
	 * @param name
	 * @param health
	 * @param strength
	 * @param attackItem
	 * @param defenseItem
	 */
	public Warrior(String type, String name, int health, int strength, Weapon attackItem, String defenseItem) {
		super("Guerrier", name, health, strength, attackItem, defenseItem);
		// TODO Auto-generated constructor stub
	}

	/**
	 * Second constructor with name params
	 * Sets default values for other params
	 * @param name
	 */
	public Warrior(String name) {
		this("Guerrier", name,5, 5, new Weapon(), "Bouclier");
	}
	
	/**
	 * Third constructor with no params
	 * Sets default values for all params
	 */
	public Warrior() {
		super("Guerrier", "Guerrier", 5, 5, new Weapon(), "Bouclier");
	}
}
