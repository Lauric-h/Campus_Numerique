package item;

public abstract class Item {
	private String name;
	private String type;
	private int value;
	
	/**
	 * Constructor
	 * @param name
	 * @param type
	 * @param value
	 */
	public Item(String name, String type, int value) {
		super();
		this.name = name;
		this.type = type;
		this.value = value;
	}

	@Override
	public String toString() {
		return "Item [name=" + name + ", type=" + type + ", value=" + value + "]";
	}

	// Getters and setters
	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public int getValue() {
		return value;
	}

	public void setValue(int value) {
		this.value = value;
	}
	
	
}
