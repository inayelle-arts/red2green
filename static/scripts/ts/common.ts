abstract class DomElement
{
	protected dom: JQuery<HTMLElement>;
	
	protected constructor(dom: JQuery<HTMLElement>)
	{
		if (dom === null || typeof dom === 'undefined')
		{
			throw new DOMException("Element dom cannot be null!");
		}
		this.dom = dom;
	}
}

class Menu extends DomElement
{
	private static readonly ChildClass = '.menu-item-optional';
	
	private itemsContainer: JQuery<HTMLElement>;
	
	private items: Array<JQuery<HTMLElement>>;
	
	private isOpened: boolean;
	
	constructor(root: JQuery<HTMLElement>, itemsContainer: JQuery<HTMLElement>)
	{
		super(root);
		
		this.isOpened = false;
		this.itemsContainer = itemsContainer;
		
		this.items = [].slice.apply(itemsContainer.children(Menu.ChildClass));
	}
	
	public bindEvents(): void
	{
		this.dom.on("click", () => this.click());
	}
	
	private click(): void
	{
		this.isOpened ? this.close() : this.open();
	}
	
	private close()
	{
		this.isOpened = false;
		this.items.forEach((item) => {
			$(item).hide(1);
		});
	}
	
	private open()
	{
		this.isOpened = true;
		this.items.forEach((item: JQuery<HTMLElement>) => {
//			item.show(1);
			$(item).show(1);
		});
	}
}

$(() => {
	const menu = new Menu($("#menu"), $("#menu-container"));
	menu.bindEvents();
});