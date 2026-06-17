import { Link } from '@inertiajs/react';
import { CheckCircle } from 'lucide-react';

interface ServiceCardProps {
    servicio: {
        id: number;
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        descripcion?: string;
        imagen?: string;
        tiene_beneficios?: boolean;
        beneficios_count?: number;
    };
}

export default function ServiceCard({ servicio }: ServiceCardProps) {
    return (
        <Link
            href={`/servicio/${servicio.slug}`}
            className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30"
        >
            <div className="relative h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                {servicio.imagen ? (
                    <img
                        src={servicio.imagen}
                        alt={servicio.nombre}
                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    />
                ) : (
                    <div className="w-full h-full flex items-center justify-center">
                        <span className="text-gray-400 text-6xl font-bold opacity-20">
                            {servicio.nombre.charAt(0)}
                        </span>
                    </div>
                )}
                <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>

            <div className="p-6">
                <h3 className="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#EA0A2A] transition-colors">
                    {servicio.nombre}
                </h3>
                <p className="text-gray-600 text-sm mb-4 line-clamp-2">
                    {servicio.descripcion_corta || servicio.descripcion}
                </p>
                {servicio.tiene_beneficios && (
                    <div className="flex items-center gap-2 text-[#EA0A2A] text-sm font-semibold">
                        <CheckCircle size={16} />
                        <span>{servicio.beneficios_count} beneficios incluidos</span>
                    </div>
                )}
            </div>
        </Link>
    );
}
