package menu;

import java.util.ArrayList;

import character.Adventurer;
import game.Game;

public class AdventurerModification extends Menu {
	public Game game;
	
	public AdventurerModification(Game game) {
		super();
		// TODO Auto-generated constructor stub
		this.game = game;
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
	 * Modify character name
	 * @param adventurers
	 * @param userChoice
	 */
	private void modifyAdventurer(ArrayList<Adventurer> adventurers, int userChoice) {
		if (userChoice == 0) {
			return;
		}
		System.out.println("Modifier le nom de ton aventurier :");
		try {
			adventurers.get(userChoice - 1).setName(this.input.next());
		} catch(Exception e) {
			System.out.println(e);
		}
		
		System.out.println("Nouveau nom : " + adventurers.get(userChoice - 1).getName());
		//this.displayAdventurers(adventurers); TODO - put into game class
	}
	
	/**
	 * Handles deletion of character
	 * Exits game if no more characters left
	 * @param adventurers
	 * @param userChoice
	 * @return ArrayList of characters
	 */
	private ArrayList<Adventurer> deleteAdventurer(int userChoice) {
		if (userChoice == 0) {
			System.out.println("Ok, on conserve tous les aventuriers !");
			return this.game.getAdventurers();
		}
		
		System.out.println("Modifier l'aventurier :");
		try {
			System.out.println("Suppression du " + this.game.getAdventurers().get(userChoice - 1).getType() + " " + this.game.getAdventurers().get(userChoice - 1).getName() + "...");
			this.game.getAdventurers().remove(userChoice - 1);
			if (this.game.getAdventurers().size() == 0) {
				System.out.println("Il n'y a plus d'aventuriers ! Fin du jeu...");
				System.exit(0);
			}
		} catch(Exception e) {
			System.out.println(e);
		}
		
		this.game.displayAdventurers();
		
		return this.game.getAdventurers();
	}
	
	/**
	 * Handles customization of adventurer stats
	 * Player gets 1 point to distribute
	 * Cheat code available
	 */
	private void customizeAdventurer() {
		System.out.println("Tu possèdes 1 point à dépenser pour améliorer les caractéristiques de ton aventurier...");
		System.out.println("Pour rappel, voici ton personnage :");
		this.game.getPlayerAdventurer().displayStats();
		
		System.out.println("Quelle caractéristique souhaites-tu améliorer ?");
		System.out.println("1. Points de vie");
		System.out.println("2. Attaque");
		
		switch(this.input.nextInt()) {
			case 1:
				this.game.getPlayerAdventurer().setHealth(this.game.getPlayerAdventurer().getHealth() + 1);
				break;
			case 2:
				this.game.getPlayerAdventurer().setStrength(this.game.getPlayerAdventurer().getStrength() + 1);
				break;
			case 6:
				this.game.getPlayerAdventurer().setStrength(999);
				this.game.getPlayerAdventurer().setHealth(999);
				break;
			default:
				break;
		}
		
		System.out.println("Super ! ton personnage est prêt pour l'aventure avec ses nouvelles caractéristiques :");
		this.game.getPlayerAdventurer().displayStats();
	}
	
	
	public void customization() {
		System.out.println("Tu peux encore modifier un personnage si tu le souhaites, ou appuyer sur 0 pour continuer");
		this.modifyAdventurer(this.game.getAdventurers(), this.input.nextInt());
				
		// Character deletion 
		System.out.println("Tu peux aussi supprimer un personnage (for ever !), ou appuyer sur 0 pour continuer");
		this.deleteAdventurer(this.input.nextInt());
		
		// Character selection
		do {
			System.out.println("Maintenant que les personnages sont créés, il faut en choisir un...");
			System.out.println("Lequel souhaites-tu choisir ? (Appuie sur 0 pour revoir la liste des personnages)");
			try {
				this.game.setPlayerAdventurer(this.input.nextInt());
			} catch (Exception e) {
				System.out.println(e);
			}
		} while(this.game.getPlayerAdventurer() == null);

		// Character customization
		System.out.println("Excellent choix ! Tu vas pouvoir passer à la personnalisation de ton " + game.getPlayerAdventurer().getType() + "...");
		try {
			this.customizeAdventurer();
		} catch(Exception e) {
			System.out.println(e);
		}
	}

}
