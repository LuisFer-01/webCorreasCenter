import { Link } from '@inertiajs/react';

interface IndustryCardProps {
    industria: {
        id: number;
        nombre: string;
        slug: string;
        descripcion?: string;
        icono?: string;
        imagen?: string;
        subcategorias_count?: number;
        servicios_count?: number;
    };
}

export default function IndustryCard({ industria }: IndustryCardProps) {
    return (
        <Link
            href={`/aplicacion/${industria.slug}`}
            className="group relative bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30"
        >
            <div className="relative h-48 overflow-hidden">
                {industria.imagen ? (
                    <img
                        src={industria.imagen}
                        alt={industria.nombre}
                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    />
                ) : (
                    <div className="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300" />
                )}
                <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                {industria.icono && (
                    <div className="absolute top-4 right-4 w-12 h-12 bg-white/90 backdrop-blur rounded-lg flex items-center justify-center shadow-lg">
                        <img src={industria.icono} alt="" className="w-8 h-8 object-contain" />
                    </div>
                )}

                <div className="absolute bottom-0 left-0 right-0 p-6">
                    <h3 className="text-xl font-bold text-white mb-1">{industria.nombre}</h3>
                    <div className="flex gap-3 text-white/80 text-xs">
                        {industria.subcategorias_count !== undefined && (
                            <span>{industria.subcategorias_count} productos</span>
                        )}
                        {industria.servicios_count !== undefined && industria.servicios_count > 0 && (
                            <span>• {industria.servicios_count} servicios</span>
                        )}
                    </div>
                </div>
            </div>
        </Link>
    );
}
