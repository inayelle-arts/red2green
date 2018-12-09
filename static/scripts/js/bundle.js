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
        this.dom = dom;
    }
    return DomElement;
}());
var Menu = /** @class */ (function (_super) {
    __extends(Menu, _super);
    function Menu(dom) {
        var _this = this;
        if (dom === null) {
            throw new DOMException("Element dom cannot be null!");
        }
        _this = _super.call(this, dom) || this;
        _this.isOpened = false;
        return _this;
    }
    Menu.prototype.bindEvents = function () {
        this.dom.on("click", this.click);
    };
    Menu.prototype.click = function () {
        this.isOpened ? this.close() : this.open();
    };
    Menu.prototype.close = function () {
        this.isOpened = false;
    };
    Menu.prototype.open = function () {
        this.isOpened = true;
    };
    return Menu;
}(DomElement));
var MenuElement = /** @class */ (function (_super) {
    __extends(MenuElement, _super);
    function MenuElement() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    return MenuElement;
}(DomElement));
$(function () {
    var menu = new Menu($("#menu"));
    menu.bindEvents();
});
