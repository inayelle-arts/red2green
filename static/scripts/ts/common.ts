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
	private static readonly LocalStorageFlag = 'menu_opened';
	
	private itemsContainer: JQuery<HTMLElement>;
	
	private items: Array<JQuery<HTMLElement>>;
	
	private isOpened: boolean;
	
	constructor(root: JQuery<HTMLElement>, itemsContainer: JQuery<HTMLElement>)
	{
		super(root);
		
		this.itemsContainer = itemsContainer;
		
		this.items = [].slice.apply(itemsContainer.children(Menu.ChildClass));
		
		this.unstoreState();
	}
	
	public bindEvents(): void
	{
		this.dom.on("click", () => {
			this.click();
			this.storeState();
		});
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
			$(item).show(1);
		});
	}
	
	private storeState(): void
	{
		localStorage.setItem(Menu.LocalStorageFlag, this.isOpened.toString());
	}
	
	private unstoreState(): void
	{
		const flag = localStorage.getItem(Menu.LocalStorageFlag);
		
		if (flag === 'true')
		{
			this.open();
		}
		else
		{
			this.isOpened = false;
		}
	}
}

$(() => {
	const menu = new Menu($("#menu"), $("#menu-container"));
	menu.bindEvents();
});