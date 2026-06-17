import { Clock, Mail, MapPin, MessageCircle, Phone } from 'lucide-react';

interface BranchCardProps {
    sucursal: {
        id: number;
        nombre: string;
        direccion: string;
        telefono: string;
        telefono_llamada: string;
        whatsapp: { numero: string; mensaje_default: string };
        whatsapp_url: string;
        email: string;
        horarios: Record<string, string>;
        mapa_incrustado?: string;
        coordenadas?: string;
        google_maps_url: string;
        tiene_coordenadas: boolean;
        tiene_mapa_incrustado: boolean;
        es_principal: boolean;
    };
}

export default function BranchCard({ sucursal }: BranchCardProps) {
    return (
        <div className={`bg-white rounded-xl shadow-md overflow-hidden border-2 ${sucursal.es_principal ? 'border-[#EA0A2A]' : 'border-gray-100'}`}>
            {sucursal.es_principal && (
                <div className="bg-[#EA0A2A] text-white px-4 py-2 text-sm font-bold text-center">
                     SUCURSAL PRINCIPAL
                </div>
            )}

            <div className="p-6">
                <h3 className="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <MapPin className="text-[#EA0A2A]" size={22} />
                    {sucursal.nombre}
                </h3>

                <div className="space-y-3 mb-6">
                    <div className="flex items-start gap-3">
                        <MapPin size={18} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                        <p className="text-gray-700 text-sm">{sucursal.direccion}</p>
                    </div>

                    <div className="flex items-center gap-3">
                        <Phone size={18} className="text-[#EA0A2A] flex-shrink-0" />
                        <a href={`tel:${sucursal.telefono_llamada}`} className="text-gray-700 text-sm hover:text-[#EA0A2A]">
                            {sucursal.telefono}
                        </a>
                    </div>

                    <div className="flex items-center gap-3">
                        <MessageCircle size={18} className="text-green-600 flex-shrink-0" />
                        <a href={sucursal.whatsapp_url} target="_blank" rel="noopener noreferrer" className="text-gray-700 text-sm hover:text-green-600">
                            WhatsApp: {sucursal.whatsapp.numero}
                        </a>
                    </div>

                    <div className="flex items-center gap-3">
                        <Mail size={18} className="text-[#EA0A2A] flex-shrink-0" />
                        <a href={`mailto:${sucursal.email}`} className="text-gray-700 text-sm hover:text-[#EA0A2A]">
                            {sucursal.email}
                        </a>
                    </div>

                    <div className="flex items-start gap-3">
                        <Clock size={18} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                        <div className="text-sm">
                            {Object.entries(sucursal.horarios).map(([dia, horario]) => (
                                <div key={dia} className="flex justify-between gap-4">
                                    <span className="text-gray-600 capitalize">{dia.replace(/_/g, ' ')}:</span>
                                    <span className="text-gray-900 font-medium">{horario}</span>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>

                {/* Mapa */}
                {sucursal.tiene_mapa_incrustado && sucursal.mapa_incrustado && (
                    <div className="h-48 rounded-lg overflow-hidden mb-4" dangerouslySetInnerHTML={{ __html: sucursal.mapa_incrustado }} />
                )}

                {/* Botones de acción */}
                <div className="flex gap-2">
                    <a
                        href={sucursal.whatsapp_url}
                        target="_blank"
                        rel="noopener noreferrer"
                        className="flex-1 inline-flex items-center justify-center gap-2 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors text-sm font-semibold"
                    >
                        <MessageCircle size={16} />
                        WhatsApp
                    </a>
                    {sucursal.tiene_coordenadas && (
                        <a
                            href={sucursal.google_maps_url}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="flex-1 inline-flex items-center justify-center gap-2 bg-gray-100 text-gray-900 px-4 py-2 rounded-md hover:bg-gray-200 transition-colors text-sm font-semibold"
                        >
                            <MapPin size={16} />
                            Ver Mapa
                        </a>
                    )}
                </div>
            </div>
        </div>
    );
}
