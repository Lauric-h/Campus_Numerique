package edu.campnum.warriors.persona;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
public class Adventurer extends Persona{
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;

    protected Adventurer() {
        super();
    };

    public Adventurer(String name, int life, int strength, String type) {
        this.name = name;
        this.life = life;
        this.strength = strength;
        this.type = type;
    }

    @Override
    public String toString() {
        return "Hero{" +
                "id=" + id +
                ", name='" + name + '\'' +
                ", life=" + life +
                ", strength=" + strength +
                ", type='" + type + '\'' +
                '}';
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
    public int getStrength() {
        return this.strength;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Long getId() {
        return id;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setLife(int life) {
        this.life = life;
    }

    public void setStrength(int strength) {
        this.strength = strength;
    }

    public void setType(String type) {
        this.type = type;
    }
}
