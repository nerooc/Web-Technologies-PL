<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:param name="sortby">brak</xsl:param>

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="../lab05/zad5.css"/>
                <title>Uczelnia</title>
            </head>
            <body>
		<h1> Sortuje nie po wydziale, lecz po kierunku! Opcje:</h1>
		<h2> '?sort by=kierunek', '?sortby=nazwisko' </h2>
                <table border="1">

                    <tbody>
                        <th colspan="4" align="center" class="uczelnia">Akademia Górniczo-Hutnicza</th>

                        <xsl:choose>

                            <xsl:when test="$sortby = 'kierunek'">

                                <xsl:for-each select="uczelnia/wydzial">

                                    <xsl:for-each select="kierunek">

                                    	<xsl:sort select="nazwakierunku"/>

                                        <tr class="nazwakierunku">
                                            <th colspan="4" align="center"><xsl:value-of select="nazwakierunku"/></th>
                                        </tr>

                                        <tr class="spis">
                                            <td align="left">IMIE: test</td>
                                            <td align="left">DRUGIE IMIE:</td>
                                            <td align="left">NAZWISKO:</td>
                                            <td align="left">NUMER INDEKSU:</td>
                                        </tr>

                                        <xsl:for-each select="student">

                                                    <tr class="student">
                                                        <td align="left"><xsl:value-of select="imie"/></td>
                                                        <td align="left"><xsl:value-of select="drugieimie"/></td>
                                                        <td align="left"><xsl:value-of select="nazwisko"/></td>
                                                        <td align="left"><xsl:value-of select="numeridx"/></td>
                                                    </tr>

                                        </xsl:for-each>

                                    </xsl:for-each>
                                    <!-- koniec petli dla wezlow student -->

                                </xsl:for-each>
                                <!-- koniec petli dla wezlow miasto -->

                            </xsl:when>

                            <xsl:otherwise>
	
                                <xsl:for-each select="uczelnia/wydzial">

                                    <xsl:for-each select="kierunek">

                                        <tr class="nazwakierunku">
                                            <th colspan="4" align="center"><xsl:value-of select="nazwakierunku"/></th>
                                        </tr>

                                        <tr class="spis">
                                            <td align="left">IMIE:</td>
                                            <td align="left">DRUGIE IMIE:</td>
                                            <td align="left">NAZWISKO:</td>
                                            <td align="left">NUMER INDEKSU:</td>
                                        </tr>

                                        <xsl:for-each select="student">

                                                    <xsl:sort select="nazwisko/text()"/>

                                                    <tr class="student">
                                                        <td align="left"><xsl:value-of select="imie"/></td>
                                                        <td align="left"><xsl:value-of select="drugieimie"/></td>
                                                        <td align="left"><xsl:value-of select="nazwisko"/></td>
                                                        <td align="left"><xsl:value-of select="numeridx"/></td>
                                                    </tr>

                                                </xsl:for-each>

                                    </xsl:for-each>
                                    <!-- koniec petli dla wezlow student -->

                                </xsl:for-each>
                                <!-- koniec petli dla wezlow miasto -->

                            </xsl:otherwise>
                        </xsl:choose>
                    </tbody>

                </table>
                <br/>

            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>