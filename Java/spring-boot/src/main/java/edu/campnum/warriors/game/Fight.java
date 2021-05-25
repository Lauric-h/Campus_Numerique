package edu.campnum.warriors.game;

import edu.campnum.warriors.persona.Adventurer;
import edu.campnum.warriors.persona.Persona;

import java.util.Scanner;

/**
 * Fight class
 * Between two characters
 * @author lauric
 *
 */
public class Fight {
	private Monster monster;
	private Adventurer hero;
	private Scanner sc;
	private boolean continueFight;
	private String winner;
	
	/**
	 * Constructor
	 * @param monster persona involved in fight
	 * @param hero persona involved in fight
	 */
	public Fight(Persona monster, Adventurer hero) {
		this.monster = monster;
		this.hero = hero;
		this.sc = new Scanner(System.in);
		this.continueFight = true;
	}

	/**
	 * Main fight function
	 * Continue looping while both characters are alive
	 */
	public void fight() {
		System.out.println("=== Vous rencontrez un " + this.monster.getName() + " ===");
		System.out.println("Le combat commence !");
		do {
			this.hit(monster, hero);
			if (!this.continueFight) {
				break;
			}
			this.nextTurn();
		} while (this.continueFight);
		System.out.println("Le combat est terminé ! " + this.winner + " a gagné !");
	}
	
	/**
	 * Displays health and strength of both characters
	 */
	private void displayCarac() {
		System.out.println("===\nL'ennemi : \nForce : " + this.monster.getAttackLevel() + "\nVie : " + monster.getLife());
		System.out.println("===\nVos caractéristiques : \nForce : " + this.hero.getAttackLevel() + "\nVie : " + this.hero.getLife() + "\n===");
	}
	
	/**
	 * Asks user to type something to attack
	 * Triggers hit from hero on monster
	 */
	private void nextTurn() {
		System.out.println("Appuyez sur une touche pour attaquer");
		if(sc.hasNext()) {
			sc.nextLine();
			this.hit(hero, monster);
		}
	}
	
	/**
	 * Checks if the character is alive
	 * @param persona to check life
	 * @return bool if alive or not
	 */
	private boolean isAlive(Persona persona) {
		return persona.getLife() > 0;
	}
	
	/**
	 * Attacker attacks the attacked
	 * Checks if character is alive
	 * @param attacker persona object
	 * @param attacked persona object
	 */
	private void hit(Persona attacker, Persona attacked) {
		this.displayCarac();
		System.out.println("Le " + attacker.getName() + " attaque " + attacked.getName() + "(-" + attacker.getAttackLevel() + "hp)");
		attacked.setLife(attacked.getLife() - attacker.getAttackLevel());
		if(!this.isAlive(attacked)) {
			this.winner = attacker.getName();
			this.continueFight = false;
		}
	}

	/**
	 * Gets winner of the fight
	 * @return string name of winner
	 */
	public String getWinner() {
		return winner;
	}
}
