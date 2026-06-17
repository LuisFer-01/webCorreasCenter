import { Link } from '@inertiajs/react';

interface SubcategoryCardProps {
    subcategoria: {
        id: number;
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        imagen?: string;
        url?: string;
        marcas_disponibles?: Array<{
            id: number;
            nombre: string;
            logo: string;
        }>;
    };
}

export default function SubcategoryCard({ subcategoria }: SubcategoryCardProps) {
    return (
        <Link
            href={`/subcategoria/${subcategoria.slug}`}
            className="group bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30"
        >
            {/* Imagen */}
            <div className="relative h-40 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                {subcategoria.imagen ? (
                    <img
                        src={subcategoria.imagen}
                        alt={subcategoria.nombre}
                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    />
                ) : (
                    <div className="w-full h-full flex items-center justify-center">
                        <span className="text-gray-400 text-5xl font-bold opacity-20">
                            {subcategoria.nombre.charAt(0)}
                        </span>
                    </div>
                )}

                <div className="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>

            {/* Contenido */}
            <div className="p-4">
                <h3 className="text-lg font-bold text-gray-900 mb-1 group-hover:text-[#EA0A2A] transition-colors line-clamp-1">
                    {subcategoria.nombre}
                </h3>

                {subcategoria.descripcion_corta && (
                    <p className="text-gray-600 text-sm mb-3 line-clamp-2">
                        {subcategoria.descripcion_corta}
                    </p>
                )}

                {/* Marcas miniatura */}
                {subcategoria.marcas_disponibles && subcategoria.marcas_disponibles.length > 0 && (
                    <div className="flex items-center gap-2 pt-2 border-t border-gray-100">
                        <div className="flex -space-x-2">
                            {subcategoria.marcas_disponibles.slice(0, 3).map((marca) => (
                                <div
                                    key={marca.id}
                                    className="w-8 h-8 bg-white rounded-full border-2 border-white shadow-sm overflow-hidden"
                                    title={marca.nombre}
                                >
                                    {marca.logo ? (
                                        <img
                                            src={marca.logo}
                                            alt={marca.nombre}
                                            className="w-full h-full object-contain p-1"
                                        />
                                    ) : (
                                        <div className="w-full h-full bg-gray-200 flex items-center justify-center">
                                            <span className="text-[10px] font-bold text-gray-500">
                                                {marca.nombre.charAt(0)}
                                            </span>
                                        </div>
                                    )}
                                </div>
                            ))}
                        </div>
                        {subcategoria.marcas_disponibles.length > 3 && (
                            <span className="text-xs text-gray-500">
                                +{subcategoria.marcas_disponibles.length - 3}
                            </span>
                        )}
                    </div>
                )}
            </div>
        </Link>
    );
}
