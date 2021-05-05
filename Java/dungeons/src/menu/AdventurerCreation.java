package menu;

import java.util.ArrayList;

import character.*;

/**
 * Character creation menu class
 * Only for character creation
 * @author lauric
 *
 */
public class AdventurerCreation extends Menu {
	
	/**
	 * Constructor
	 */
	public AdventurerCreation() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * Exit request method
	 * Exits only the current menu, not the game
	 */
	@Override
	protected void requestExit() {
		// TODO Auto-generated method stub
		System.out.println("Créer un nouvel aventurier(1) ou quitter le menu de création(0) ?");
		if (input.nextInt() == 0) {
			this.exitRequest = true;
			System.out.println("Retour au menu principal...");
			return;
		} 
	}

	/**
	 * Prompts user for character choice
	 * Checks for invalid input
	 * @return String - input from user
	 */
	private String choseAdventurer() {
		System.out.println("Il va falloir choisir un aventurier...");
		System.out.println("Deux choix s'offrent à toi :");
		
		String answer = "";
				
		do {
			System.out.println("Choisiras-tu le guerrier ou le mage ?");
			answer = this.input.next().toLowerCase();
		} while (answer.length() == 0 || !answer.startsWith("mage") && !answer.startsWith("guerrier"));
	
		if (answer.startsWith("guerrier")) {
			answer = "Guerrier";
		} else if (answer.startsWith("mage")) {
			answer = "Mage";
		} 
		
		System.out.println("Bravo, tu as choisi un " + answer + " !");
		return answer;
	}
	
	/**
	 * Creates new character from user input
	 * @param choice
	 * @return Character object
	 */
	private Adventurer createAdventurer(String choice) {
		Adventurer playerAdventurer = null;
		if (choice == "Guerrier") {
			playerAdventurer = new Warrior(); 
		}
		if (choice == "Mage") {
			playerAdventurer = new Mage();
		}
		
		return playerAdventurer;
	}
	
	/**
	 * Prompts user for name
	 * Checks for empty input
	 * @return String - name
	 */
	private String choseName() {
		String answer = "";

		do {
			System.out.println("Choisis un nom pour ton aventurier : ");
			answer = this.input.next();
		} while (answer.length() == 0);
		
		return answer;
	}
	
	/**
	 * Main method grouping other methods
	 * Only methods to be used outside
	 */
	public void createAdventurerMenu(ArrayList<Adventurer> adventurers){
		// Create adventurer
		String choice = this.choseAdventurer();
		Adventurer player = this.createAdventurer(choice);
		System.out.println("Maintenant, il faut personnaliser ton " + choice + "..."); 
					
		// Name adventurer
		player.setName(this.choseName());
		System.out.println("Super " + player.getName() + " !"); 
					
		System.out.println("Ton " + choice + " est créé ! Voici ses informations :");
		player.displayStats();
					
		// Add adventurer to array
		adventurers.add(player);
					
		// Ask to continue or stop
		try {
			this.requestExit();
		} catch(Exception e) {
			System.out.println("Réponse invalide...");
			System.out.println("Retour au menu principal...");
			this.exitRequest = true;
			return;
		}
	}	
}
