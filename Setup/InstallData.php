<?php

namespace Barranco\MexicanRegions\Setup;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface {

	/**
	 * @var \Magento\Directory\Helper\Data
	 */
	protected $_directoryData;

	/**
	 * Init
	 * @param \Magento\Directory\Helper\Data $directoryData 
	 */
	public function __construct(
		\Magento\Directory\Helper\Data $directoryData
	) {
		$this->_directoryData = $directoryData;
	}

	/**
   * {@inheritdoc}
   * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
   */
	public function install(
		\Magento\Framework\Setup\ModuleDataSetupInterface $setup,
		\Magento\Framework\Setup\ModuleContextInterface $context
	) {

		$data = [
			['MX', 'AS', 'Aguascalientes'],
			['MX', 'BC', 'Baja California'],
			['MX', 'BS', 'Baja California Sur'],
			['MX', 'CC', 'Campeche'],
			['MX', 'CS', 'Chiapas'],
			['MX', 'CH', 'Chihuahua'],
			['MX', 'CL', 'Coahuila'],
			['MX', 'CM', 'Colima'],
			['MX', 'DF', 'Ciudad de México'],
			['MX', 'DG', 'Durango'],
			['MX', 'GT', 'Guanajuato'],
			['MX', 'GR', 'Guerrero'],
			['MX', 'HG', 'Hidalgo'],
			['MX', 'JC', 'Jalisco'],
			['MX', 'MC', 'Estado de México'],
			['MX', 'MN', 'Michoacán'],
			['MX', 'MS', 'Morelos'],
			['MX', 'NT', 'Nayarit'],
			['MX', 'NL', 'Nuevo León'],
			['MX', 'OC', 'Oaxaca'],
			['MX', 'PL', 'Puebla'],
			['MX', 'QO', 'Querétaro'],
			['MX', 'QR', 'Quintana Roo'],
			['MX', 'SP', 'San Luís Potosí'],
			['MX', 'SL', 'Sinaloa'],
			['MX', 'SR', 'Sonora'],
			['MX', 'TC', 'Tabasco'],
			['MX', 'TS', 'Tamaulipas'],
			['MX', 'TL', 'Tlaxcala'],
			['MX', 'VZ', 'Veracruz'],
			['MX', 'YN', 'Yucatán'],
			['MX', 'ZS', 'Zacatecas']
		];

		foreach($data as $row) {
			
			$bind = [
				'country_id' 		=> $row[0],
				'code'					=> $row[1],
				'default_name' 	=> $row[2]	
			];
			
			$setup->getConnection()->insert($setup->getTable('directory_country_region'), $bind);

			$regionId = $setup->getConnection()->lastInsertId($setup->getTable('directory_country_region'));

			$bind = [
				'locale' 		=> 'es_MX',
				'region_id' => $regionId,
				'name'			=> $row[2]
			];

			$setup->getConnection()->insert($setup->getTable('directory_country_region_name'), $bind);
		}
	}
}