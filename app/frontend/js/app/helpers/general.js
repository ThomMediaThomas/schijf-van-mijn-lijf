var IMAGEHELPER = {
    RESOLVE: function (url) {
        return url ? CONFIG.IMAGE_URL + url.replace(/\\/g,"/") : url;
    }
};

var DISPLAYHELPER = {
    ROUND: function (num) {
        var roundedValue = Math.round(num * 10) / 10,
            formattedValue = isNaN(roundedValue) ? num : roundedValue;
        return formattedValue.toString().replace('.', ',');
    }
};
