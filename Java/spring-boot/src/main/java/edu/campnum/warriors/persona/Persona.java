package edu.campnum.warriors.persona;

import edu.campnum.warriors.contracts.Hero;
import javax.persistence.MappedSuperclass;

/**
 * Main class for every characters
 * Implements Hero interface
 * @author lauric
 *
 */
@MappedSuperclass
public abstract class Persona implements Hero {
	protected String name;
	protected int life;
	protected int strength;
	protected String type;

	protected Persona() {};

	/**
	 * Constructor
	 * @param name of persona
	 * @param life level of persona
	 * @param strength of persona
	 * @param type of persona (monster, wizard, soldier)
	 */
	public Persona(String name, int life, int strength, String type) {
		super();
		this.name = name;
		this.life = life;
		this.strength = strength;
		this.type = type;
	}

	@Override
	public String getName() {
		return this.name;
	}

	@Override
	public int getLife() {
		return this.life;
	}

	@Override
	public int getStrength () {
		return this.strength;
	}

	/**
	 * Gets type of Persona : warrior or wizard
	 * @return String type
	 */
	public String getType() {
		return type;
	}

	// setters
	/**
	 * @param name of the persona
	 */
	public void setName(String name) {
		this.name = name;
	}

	/**
	 * sets life
	 * @param life of persona
	 */
	public void setLife(int life) {
		this.life = life;
	}

	/**
	 * Sets attack of persona
	 * @param strength of persona
	 */
	public void setStrength(int strength) {
		this.strength = strength;
	}

	@Override
	public String toString() {
		return name + ", Points de vie = " + life + ", Points d'attaque = " + strength;
	}
}
