interface ProductMeasurementsProps {
    medidas_productos: Record<string, any>;
}

export default function ProductMeasurements({ medidas_productos }: ProductMeasurementsProps) {
    if (!medidas_productos || Object.keys(medidas_productos).length === 0) {
        return null;
    }

    const keys = Object.keys(medidas_productos);
    const allMeasureKeys = Object.keys(medidas_productos[keys[0]]);

    return (
        <div className="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            <h3 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div className="w-1 h-8 bg-[#EA0A2A] rounded-full"></div>
                Medidas y Especificaciones
            </h3>
            <div className="overflow-x-auto">
                <table className="w-full">
                    <thead>
                        <tr className="bg-gray-50 border-b border-gray-200">
                            <th className="text-left p-3 text-sm font-bold text-gray-700 uppercase">
                                Gama
                            </th>
                            {allMeasureKeys.map((key) => (
                                <th key={key} className="text-left p-3 text-sm font-bold text-gray-700 uppercase">
                                    {key.replace(/_/g, ' ')}
                                </th>
                            ))}
                        </tr>
                    </thead>
                    <tbody>
                        {Object.entries(medidas_productos).map(([gama, medidas]) => (
                            <tr key={gama} className="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td className="p-3 font-semibold text-[#EA0A2A] capitalize">
                                    {gama.replace(/_/g, ' ')}
                                </td>
                                {Object.values(medidas as Record<string, string>).map((value, idx) => (
                                    <td key={idx} className="p-3 text-gray-700">
                                        {value}
                                    </td>
                                ))}
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
}
