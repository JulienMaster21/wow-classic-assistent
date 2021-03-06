"use strict";
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
exports.__esModule = true;
exports.PasswordInput = void 0;
var TextInput_1 = require("./TextInput");
var PasswordInput = /** @class */ (function (_super) {
    __extends(PasswordInput, _super);
    function PasswordInput(identifier, name, minimumSize, maximumSize, allowedCharacters, element) {
        if (element === void 0) { element = null; }
        return _super.call(this, identifier, name, minimumSize, maximumSize, allowedCharacters, element) || this;
    }
    return PasswordInput;
}(TextInput_1.TextInput));
exports.PasswordInput = PasswordInput;
