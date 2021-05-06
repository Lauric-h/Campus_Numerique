package character;

import java.lang.Math;

import item.*;

/**
 * Class Monster inherits from Adventurer
 * @author lauric
 *
 */
public class Monster extends Adventurer {

	/**
	 * Constructor
	 * @param type
	 * @param name
	 * @param health
	 * @param strength
	 * @param attackItem
	 * @param defenseItem
	 */
	public Monster(String type, String name, int health, int strength, Attack attackItem, String defenseItem) {
		super(type, name, health, strength, attackItem, defenseItem);
		// TODO Auto-generated constructor stub
	}
	
	/**
	 * Constructor with default value
	 * Random int for health and strength
	 */
	public Monster() {
		super("Troll des cavernes", "Gloubi", (int)(Math.random()*(20-2+1)+2), (int)(Math.random()*(8-2+1)+2), new Weapon(), "");
	}

	

}
