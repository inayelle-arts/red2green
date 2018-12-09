var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var DomElement = /** @class */ (function () {
    function DomElement(dom) {
        if (dom === null || typeof dom === 'undefined') {
            throw new DOMException("Element dom cannot be null!");
        }
        this.dom = dom;
    }
    return DomElement;
}());
var Menu = /** @class */ (function (_super) {
    __extends(Menu, _super);
    function Menu(root, itemsContainer) {
        var _this = _super.call(this, root) || this;
        _this.isOpened = false;
        _this.itemsContainer = itemsContainer;
        _this.items = [].slice.apply(itemsContainer.children(Menu.ChildClass));
        return _this;
    }
    Menu.prototype.bindEvents = function () {
        var _this = this;
        this.dom.on("click", function () { return _this.click(); });
    };
    Menu.prototype.click = function () {
        this.isOpened ? this.close() : this.open();
    };
    Menu.prototype.close = function () {
        this.isOpened = false;
        this.items.forEach(function (item) {
            $(item).hide(1);
        });
    };
    Menu.prototype.open = function () {
        this.isOpened = true;
        this.items.forEach(function (item) {
            //			item.show(1);
            $(item).show(1);
        });
    };
    Menu.ChildClass = '.menu-item-optional';
    return Menu;
}(DomElement));
$(function () {
    var menu = new Menu($("#menu"), $("#menu-container"));
    menu.bindEvents();
});
