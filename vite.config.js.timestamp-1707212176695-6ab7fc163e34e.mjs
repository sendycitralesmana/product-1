// vite.config.js
import { defineConfig } from "file:///C:/Data/mareca/product-1/node_modules/vite/dist/node/index.js";
import laravel from "file:///C:/Data/mareca/product-1/node_modules/laravel-vite-plugin/dist/index.js";
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js"
      ],
      refresh: [
        "resources/routes/**",
        "routes/**",
        "resources/views/**"
      ]
    })
  ]
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJDOlxcXFxEYXRhXFxcXG1hcmVjYVxcXFxwcm9kdWN0LTFcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfZmlsZW5hbWUgPSBcIkM6XFxcXERhdGFcXFxcbWFyZWNhXFxcXHByb2R1Y3QtMVxcXFx2aXRlLmNvbmZpZy5qc1wiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9pbXBvcnRfbWV0YV91cmwgPSBcImZpbGU6Ly8vQzovRGF0YS9tYXJlY2EvcHJvZHVjdC0xL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XG5pbXBvcnQgbGFyYXZlbCBmcm9tICdsYXJhdmVsLXZpdGUtcGx1Z2luJztcbiBcbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XG4gICAgcGx1Z2luczogW1xuICAgICAgICBsYXJhdmVsKHtcbiAgICAgICAgICAgIGlucHV0OiBbXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9jc3MvYXBwLmNzcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9qcy9hcHAuanMnXG4gICAgICAgICAgICBdLFxuICAgICAgICAgICAgcmVmcmVzaDogW1xuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvcm91dGVzLyoqJyxcbiAgICAgICAgICAgICAgICAncm91dGVzLyoqJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL3ZpZXdzLyoqJyxcbiAgICAgICAgICAgIF0sXG4gICAgICAgIH0pLFxuICAgIF0sXG59KTsiXSwKICAibWFwcGluZ3MiOiAiO0FBQWtRLFNBQVMsb0JBQW9CO0FBQy9SLE9BQU8sYUFBYTtBQUVwQixJQUFPLHNCQUFRLGFBQWE7QUFBQSxFQUN4QixTQUFTO0FBQUEsSUFDTCxRQUFRO0FBQUEsTUFDSixPQUFPO0FBQUEsUUFDSDtBQUFBLFFBQ0E7QUFBQSxNQUNKO0FBQUEsTUFDQSxTQUFTO0FBQUEsUUFDTDtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsTUFDSjtBQUFBLElBQ0osQ0FBQztBQUFBLEVBQ0w7QUFDSixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
