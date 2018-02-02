var DEBUG = true;
var CONFIG = {
    //API: 'http://api.schijf-van-mijn-lijf.localhost',
    API: 'http://schijf-api.thommedia.nl',
    //IMAGE_URL: 'http://api.schijf-van-mijn-lijf.localhost',
    IMAGE_URL: 'http://schijf-api.thommedia.nl',
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
        PROGRAMS: '/programs',
    },
    HOME: 'entries',
    DATE_FORMATS: {
        API: 'YYYY-MM-DD',
        HUMAN: 'dddd D MMMM YYYY',
        HUMAN_SHORT: 'DD-MM-YYYY',
    },
    GOAL_TYPES_FRIENDLY: {
        'stay': 'Op gewicht blijven',
        'loose': 'Afvallen',
        'gain': 'Aankomen',
    },
    KCAL_PER_GRAM: {
        carbs: 4,
        proteins: 4,
        fats: 9
    },
    MACRONUTRIENTS: {
        gain: {
            carbs: 60,
            proteins: 35,
            fats: 25
        },
        loose: {
            carbs: 30,
            proteins: 40,
            fats: 20
        },
        stay: {
            carbs: 50,
            proteins: 35,
            fats: 35
        }
    }
};
