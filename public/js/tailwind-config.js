tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                "on-secondary-fixed": "#261900",
                "surface-bright": "#fcf9f2",
                "surface-container-highest": "#e5e2db",
                "secondary-fixed": "#ffdea5",
                "on-primary-fixed-variant": "#1f477b",
                "surface-dim": "#dcdad3",
                "on-tertiary-fixed": "#261a00",
                "secondary-container": "#fed488",
                "on-primary-fixed": "#001b3c",
                "surface-variant": "#e5e2db",
                "on-error": "#ffffff",
                "on-surface-variant": "#43474f",
                "primary": "#001e40",
                "tertiary-container": "#433000",
                "outline": "#737780",
                "primary-fixed": "#d5e3ff",
                "surface-container-high": "#ebe8e1",
                "surface-tint": "#3a5f94",
                "on-primary-container": "#799dd6",
                "on-surface": "#1c1c18",
                "surface-container-low": "#f6f3ec",
                "tertiary-fixed": "#ffdfa0",
                "inverse-surface": "#31312c",
                "on-tertiary-fixed-variant": "#5c4300",
                "error-container": "#ffdad6",
                "surface": "#fcf9f2",
                "on-tertiary": "#ffffff",
                "on-secondary-fixed-variant": "#5d4201",
                "on-background": "#1c1c18",
                "tertiary": "#291c00",
                "surface-container": "#f0eee7",
                "primary-fixed-dim": "#a7c8ff",
                "primary-container": "#003366",
                "inverse-primary": "#a7c8ff",
                "on-error-container": "#93000a",
                "on-primary": "#ffffff",
                "tertiary-fixed-dim": "#fbbc00",
                "background": "#fcf9f2",
                "on-tertiary-container": "#c59300",
                "error": "#ba1a1a",
                "on-secondary-container": "#785a1a",
                "secondary": "#775a19",
                "inverse-on-surface": "#f3f0ea",
                "outline-variant": "#c3c6d1",
                "on-secondary": "#ffffff",
                "secondary-fixed-dim": "#e9c176",
                "surface-container-lowest": "#ffffff"
            },
            borderRadius: {
                DEFAULT: "0.25rem",
                lg: "0.5rem",
                xl: "0.75rem",
                full: "9999px"
            },
            spacing: {
                base: "8px",
                "margin-desktop": "64px",
                "margin-mobile": "20px",
                "container-max": "1280px",
                gutter: "24px"
            },
            fontFamily: {
                "label-sm": ["Montserrat"],
                "label-lg": ["Montserrat"],
                "body-md": ["Montserrat"],
                "body-lg": ["Montserrat"],
                "headline-md": ["Playfair Display"],
                "headline-lg": ["Playfair Display"],
                "display-lg": ["Playfair Display"],
                "display-lg-mobile": ["Playfair Display"]
            },
            fontSize: {
                "label-sm": ["12px", { lineHeight: "16px", fontWeight: "500" }],
                "label-lg": ["14px", { lineHeight: "20px", letterSpacing: "0.1em", fontWeight: "600" }],
                "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
                "headline-md": ["32px", { lineHeight: "40px", fontWeight: "600" }],
                "headline-lg": ["48px", { lineHeight: "56px", fontWeight: "600" }],
                "display-lg": ["64px", { lineHeight: "72px", letterSpacing: "-0.02em", fontWeight: "700" }],
                "display-lg-mobile": ["40px", { lineHeight: "48px", fontWeight: "700" }]
            }
        }
    }
};
