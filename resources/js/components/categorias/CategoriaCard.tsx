import type { Categoria } from '@/types';
import { Link } from '@inertiajs/react';

interface CategoryCardProps {
    categoria: Categoria;
}

export default function CategoryCard({ categoria }: CategoryCardProps) {
    return (
        <Link
            href={`/categoria/${categoria.slug}`}
            className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30"
        >
            {/* Imagen de la categoría */}
            <div className="relative h-48 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                {categoria.imagen ? (
                    <img
                        src={categoria.imagen}
                        alt={categoria.nombre}
                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    />
                ) : (
                    <div className="w-full h-full flex items-center justify-center">
                        <span className="text-gray-400 text-6xl font-bold opacity-20">
                            {categoria.nombre.charAt(0)}
                        </span>
                    </div>
                )}

                {/* Overlay con gradiente */}
                <div className="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                {/* Badge de subcategorías */}
                {categoria.subcategorias_count !== undefined && categoria.subcategorias_count > 0 && (
                    <div className="absolute top-3 right-3 bg-[#EA0A2A] text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                        {categoria.subcategorias_count} {categoria.subcategorias_count === 1 ? 'subcategoría' : 'subcategorías'}
                    </div>
                )}
            </div>

            {/* Contenido */}
            <div className="p-6">
                <h3 className="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#EA0A2A] transition-colors">
                    {categoria.nombre}
                </h3>

                {categoria.descripcion_corta && (
                    <p className="text-gray-600 text-sm mb-4 line-clamp-2">
                        {categoria.descripcion_corta}
                    </p>
                )}

                {/* Marcas disponibles */}
                {categoria.marcas_disponibles && categoria.marcas_disponibles.length > 0 && (
                    <div className="border-t border-gray-100 pt-4">
                        <p className="text-xs text-gray-500 mb-2 font-semibold uppercase tracking-wider">
                            Marcas disponibles
                        </p>
                        <div className="flex flex-wrap gap-2">
                            {categoria.marcas_disponibles.slice(0, 4).map((marca) => (
                                <div
                                    key={marca.id}
                                    className="w-10 h-10 bg-gray-50 rounded-md border border-gray-200 flex items-center justify-center overflow-hidden hover:border-[#EA0A2A] transition-colors"
                                    title={marca.nombre}
                                >
                                    {marca.logo ? (
                                        <img
                                            src={marca.logo}
                                            alt={marca.nombre}
                                            className="w-8 h-8 object-contain"
                                        />
                                    ) : (
                                        <span className="text-xs font-bold text-gray-400">
                                            {marca.nombre.charAt(0)}
                                        </span>
                                    )}
                                </div>
                            ))}
                            {categoria.marcas_disponibles.length > 4 && (
                                <div className="w-10 h-10 bg-gray-100 rounded-md border border-gray-200 flex items-center justify-center">
                                    <span className="text-xs font-bold text-gray-600">
                                        +{categoria.marcas_disponibles.length - 4}
                                    </span>
                                </div>
                            )}
                        </div>
                    </div>
                )}

                {/* Botón Ver más */}
                <div className="mt-4 flex items-center text-[#EA0A2A] font-semibold text-sm group-hover:translate-x-1 transition-transform">
                    Ver subcategorías
                    <svg className="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </Link>
    );
}
