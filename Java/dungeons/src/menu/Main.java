package menu;

import java.util.ArrayList;
import character.*;
import game.Game; 

/**
 * Main menu classes
 * Contains submenus
 * @author lauric
 *
 */
public class Main extends Menu {
	
	public Main() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * Prompts user to exit game
	 */
	protected void requestExit() {
		System.out.println("continuer(1) ou quitter le jeu(0) ?");
		if (input.nextInt() == 0) {
			this.exitRequest = true;
			System.out.println("Le jeu est terminé, au revoir !");
			System.exit(0);
		} 
	}
	
	/**
	 * Main method
	 * Where the magic happens
	 * @param args
	 */
	public static void main(String[] args) {	
		Main main = new Main();
		Game game = new Game(true);
		game.start();
		
		// Character creation
		AdventurerCreation characterMenu = new AdventurerCreation();
		do {	
			characterMenu.createAdventurerMenu(game.getAdventurers());
		} while(!characterMenu.exitRequest);
		
		game.displayAdventurers();
		
		// Character modification
		AdventurerModification mod = new AdventurerModification(game);
		try {
			mod.customization();
		} catch(Exception e) {
			System.out.println(e);
		}
	
	}
}
