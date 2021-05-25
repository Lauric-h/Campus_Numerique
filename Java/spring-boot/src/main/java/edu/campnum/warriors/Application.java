package edu.campnum.warriors;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.RestController;

@SpringBootApplication
@RestController
public class Application {
	private static final Logger log = LoggerFactory.getLogger(Application.class);

	public static void main(String[] args) {
		SpringApplication.run(Application.class, args);
	}

	/*
	@Bean
	public CommandLineRunner demo(HeroRepository repository) {
		return (args -> {
			repository.save(new Hero("Jacki", 5, 5, "Guerrier"));
			repository.save(new Hero("Patrick", 7, 8, "Mage"));
			repository.save(new Hero("Michel", 1, 2, "Guerrier"));
			repository.save(new Hero("Clio12", 15, 10, "Mage"));

			for(Hero hero : repository.findAll()) {
				log.info(hero.toString());
			}

		});
	}
	*/
}
