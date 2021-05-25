package edu.campnum.warriors.board;

public class Dice {
	
	/**
	 * Constructor
	 */
	public Dice() {
		// TODO Auto-generated constructor stub
	}
	
	/**
	 * Launch method
	 * Generates a random number between 1-6
	 * @return random number
	 */
	public int launch() {
		return (int)(Math.random()*(6 - 1 + 1) + 1);
	}
	

}
