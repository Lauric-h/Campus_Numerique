package edu.campnum.warriors.engine;

import edu.campnum.warriors.board.Dice;
import edu.campnum.warriors.contracts.*;
import edu.campnum.warriors.db.DatabaseConnection;
import edu.campnum.warriors.persona.Adventurer;

import java.io.File;
import java.io.FileNotFoundException;
import java.lang.reflect.InvocationTargetException;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;


/**
 * Warrior class implements main API
 *
 * @author lauric
 */
public class Warriors implements WarriorsAPI {
    private List<Adventurer> adventurers;
    private List<Map> maps;
    private GameState game;
    private final Dice dice;
    private DatabaseConnection db;

    /**
     * Constructor
     * Adds heroes and maps
     *
     * @throws SQLException if no connection made
     */
    public Warriors() throws SQLException {
        super();
        this.dice = new Dice();
        this.maps = new ArrayList<Map>();

        try {
            // Adds heroes from db
            this.initHeroes();
            // Adds maps from json folder assets/maps
            this.addMapsFromFolder();
            new GsonDb();
        } catch (InstantiationException | IllegalAccessException | IllegalArgumentException | InvocationTargetException
                | NoSuchMethodException | SecurityException | SQLException | ClassNotFoundException | FileNotFoundException e) {
            e.printStackTrace();
        }

        // Add random generated maps
        this.maps.add(new RandomBoard("Dans l'enfer des Papeteries"));
        this.maps.add(new RandomBoard("Le lac d'Annecy endiablé"));

        // Add debug map - NOT WORKING
        // this.maps.add(new Board("Map debug"));

        // Populates array of maps from DB
        this.addMapsFromDb();
    }

    /**
     * Populates array list of maps from the folder /asset/maps
     *
     * @throws ClassNotFoundException
     * @throws FileNotFoundException
     */
    public void addMapsFromFolder() throws ClassNotFoundException, FileNotFoundException {
        File dir = new File("/home/lauric/Bureau/Java_Warriors_CodeDeBase/assets/maps");
        File[] files = dir.listFiles();
        GsonReader jsonReader = new GsonReader();

        for (int i = 0; i < files.length; i++) {
            this.maps.add(new JsonBoard(jsonReader.readJson(files[i].getName())));
        }
    }

    /**
     * Populates array list with Persona from DB
     * Objects are instantied from their string type in DB
     *
     * @throws SQLException              if no connection made
     * @throws IllegalAccessException    if no public constructor on class
     * @throws InstantiationException    if no empty constructor on class
     * @throws SecurityException
     * @throws NoSuchMethodException     if method not found
     * @throws InvocationTargetException
     * @throws IllegalArgumentException
     */
    private void initHeroes() throws SQLException, InstantiationException, IllegalAccessException, IllegalArgumentException, InvocationTargetException, NoSuchMethodException, SecurityException {
        this.adventurers = new ArrayList<Persona>();
        db = DatabaseConnection.getDbConnection();
        ResultSet res = db.query("SELECT * FROM warriors");

        while (res.next()) {
            try {
                Class<?> cls = Class.forName("warriors.engine.heroes.adventurers." + res.getString("type"));
                Object o = cls.getConstructor().newInstance();
                Persona p = (Persona) o;
                p.setName(res.getString("name"));
                this.adventurers.add(p);
            } catch (ClassNotFoundException e) {
                e.printStackTrace();
            }
        }
    }

    /**
     * Gets the maps saved in DB
     *
     * @return the maps in key:value pairs id:name
     * @throws SQLException
     */
    private HashMap<String, String> getMapsFromDb() throws SQLException {
        ResultSet res = db.query("SELECT * FROM boards");
        HashMap<String, String> dbMapList = new HashMap<String, String>();
        while (res.next()) {
            dbMapList.put(String.valueOf(res.getInt("id")), res.getString("name"));
        }
        return dbMapList;
    }

    /**
     * Populates array of maps from DB
     *
     * @throws NumberFormatException
     * @throws SQLException
     */
    private void addMapsFromDb() throws NumberFormatException, SQLException {
        for (String key : this.getMapsFromDb().keySet()) {
            DbBoard dbBoard = new DbBoard();
            dbBoard.buildMapFromDb(db, Integer.valueOf(key));
            this.maps.add(dbBoard);
        }
    }

    @Override
    public List<? extends Map> getMaps() {
        return this.maps;
    }

    @Override
    public List<? extends Adventurer> getHeroes() {
        return this.adventurers;
    }

    @Override
    public GameState createGame(String playerName, Adventurer adventurer, Map map) {
        this.game = new Game(playerName, adventurer, map);
        return game;
    }

    /**
     * Launches dice to play next turn
     *
     * @param gameId represents the current game played
     */
    @Override
    public GameState nextTurn(String gameID) {
        int diceNumber = this.dice.launch();
        System.out.println("Vous avez fait " + diceNumber);
        ((Game) this.game).setCurrentCase(this.game.getCurrentCase() + diceNumber);

        System.out.println(((Board) this.game.getMap()).getCells().get(this.game.getCurrentCase()).getOnCell());
        ((Game) this.game).checkCell(((Board) this.game.getMap()).getCells().get(this.game.getCurrentCase()).getOnCell());

        System.out.println(this.game.getHero());

        return game;
    }
}
