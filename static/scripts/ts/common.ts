abstract class DomElement
{
	protected dom: JQuery<HTMLElement>;
	
	protected constructor(dom: JQuery<HTMLElement>)
	{
		this.dom = dom;
	}
}

class Menu extends DomElement
{
	private elements: Array<MenuElement>;
	
	private isOpened: boolean;
	
	constructor(dom: JQuery<HTMLElement>)
	{
		if (dom === null)
		{
			throw new DOMException("Element dom cannot be null!");
		}
		
		super(dom);
		this.isOpened = false;
	}
	
	public bindEvents(): void
	{
		this.dom.on("click", this.click);
	}
	
	private click() : void
	{
		this.isOpened ? this.close() : this.open();
	}
	
	private close()
	{
		this.isOpened = false;
	}
	
	private open()
	{
		this.isOpened = true;
	}
}

class MenuElement extends DomElement
{
}

$(() => {
	const menu = new Menu($("#menu"));
	menu.bindEvents();
});