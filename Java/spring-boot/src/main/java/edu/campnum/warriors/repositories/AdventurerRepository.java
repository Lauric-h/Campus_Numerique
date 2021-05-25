package edu.campnum.warriors.repositories;

import edu.campnum.warriors.persona.Adventurer;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface AdventurerRepository extends CrudRepository<Adventurer, Long> {
    List<Adventurer> findByName(String name);
}
