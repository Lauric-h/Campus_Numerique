package menu;

import java.util.ArrayList;
import java.util.Scanner;

import character.Adventurer;

/**
 * Menu abstract class
 * @author lauric
 *
 */
public abstract class Menu {
	protected Scanner input;
	protected boolean exitRequest;

	/**
	 * Constructor
	 */
	public Menu() {
		this.input = new Scanner(System.in);	
		this.exitRequest = false;
	}
	
	/**
	 * Exit method
	 * to be implemented in classes
	 */
	abstract void requestExit();

}
