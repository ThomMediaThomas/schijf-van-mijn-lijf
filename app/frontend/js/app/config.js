var DEBUG = true;
var CONFIG = {
    //API: 'http://api.schijf-van-mijn-lijf.dev',
    API: 'http://schijf-api.thommedia.nl',
    ENDPOINTS: {
        UPLOAD: '/upload',
        ME: '/user/me',
        USER: '/user',
        PROGRESS: '/user/me/progress',
        ENTRIES: '/entries',
        SUBCATEGORIES: '/subcategories',
        MEALS: '/meals',
        DAYPARTS: '/dayparts',
        PRODUCTS: '/products',
        PRODUCT_SEARCH: '/products/search',
        MEAL_SEARCH: '/meals/search',
        BRAND_SEARCH: '/brands/search',
    },
    HOME: 'calculator',
    DATE_FORMATS: {
        API: 'YYYY-MM-DD',
        HUMAN: 'dddd D MMMM YYYY',
        HUMAN_SHORT: 'DD-MM-YYYY',
    }
};
