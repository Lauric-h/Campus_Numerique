package edu.campnum.warriors.controllers;

import edu.campnum.warriors.Application;
import edu.campnum.warriors.persona.Adventurer;
import edu.campnum.warriors.repositories.AdventurerRepository;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class HeroController {
    private static final Logger log = LoggerFactory.getLogger(Application.class);
    @GetMapping("/hero")
    public CommandLineRunner demo(AdventurerRepository repository) {
        return (args -> {
            repository.save(new Adventurer("Jacki", 5, 5, "Guerrier"));
            repository.save(new Adventurer("Patrick", 7, 8, "Mage"));
            repository.save(new Adventurer("Michel", 1, 2, "Guerrier"));
            repository.save(new Adventurer("Clio12", 15, 10, "Mage"));

            for(Adventurer adventurer : repository.findAll()) {
                log.info(adventurer.toString());
            }

        });
    }
}
