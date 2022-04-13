<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>Facture</h2>
  <table>
	 <xsl:for-each select="factures/facture">
    <tr>
      <th>Date emission<xsl:value-of select="date_emission"/></th>
      <th>Date Vente<xsl:value-of select="date_vente"/></th>
	  <th></th>
	</tr>

    </xsl:for-each>

   
    <xsl:for-each select="factures/facture/acheteur">
    <tr>
	<td>Acheteur</td>
    <td><xsl:value-of select="acheteur_denomination_sociale"/></td>
    </tr>
	 <tr>
	<td></td>
    <td><xsl:value-of select="acheteur_adresse"/></td>
    </tr>
    </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>