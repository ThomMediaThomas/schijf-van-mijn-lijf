var IMAGEHELPER = {
    RESOLVE: function (url) {
        return url ? CONFIG.IMAGE_URL + url.replace(/\\/g,"/") : url;
    }
};
