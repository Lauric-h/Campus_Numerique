package edu.campnum.warriors.items;

import edu.campnum.warriors.board.Cell;
import javax.persistence.*;

@Entity
public class Item {
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;

	private String name;

	@OneToOne(mappedBy = "item")
	private Cell cell;

	private int bonus;

	// bonus type either life or strength (Potion or Weapon)
	private String bonusType;

	protected Item() {};
	
	/**
	 * Constructor
	 * @param name of item
	 * @param bonus given by item
	 */
	public Item(String name, int bonus, String bonusType) {
		super();
		this.name = name;
		this.bonus = bonus;
		this.bonusType = bonusType;
	}

	// getters and setters
	/**
	 * Gets type of item
	 * @return String type
	 */
	public String getName() {
		return name;
	}

	/**
	 * Sets type of item
	 * @param name string
	 */
	public void setName(String name) {
		this.name = name;
	}

	/**
	 * Gets bonus given by item
	 * @return bonus int
	 */
	public int getBonus() {
		return bonus;
	}

	/**
	 * Sets bonus given by item
	 * @param bonus int
	 */
	public void setBonus(int bonus) {
		this.bonus = bonus;
	}

	public String getBonusType() {
		return bonusType;
	}

	public void setBonusType(String bonusType) {
		this.bonusType = bonusType;
	}

	@Override
	public String toString() {
		return "Item{" +
				"id=" + id +
				", name='" + name + '\'' +
				", bonus=" + bonus +
				", bonusType='" + bonusType + '\'' +
				'}';
	}

}
