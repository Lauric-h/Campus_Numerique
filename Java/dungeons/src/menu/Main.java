package menu;

import game.*; 

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
		
		//Board game creation
		System.out.println("Pour débuter l'aventure, combien de cases souhaites-tu ? (max 64)");
		Board board;
		try {
			board = new Board(main.input.nextInt());
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("64 max on a dit !");
			board = new Board();
		}
		game.displayRules(Board.getStart(), board.getMaxCells());
	
		

		
	}
}
